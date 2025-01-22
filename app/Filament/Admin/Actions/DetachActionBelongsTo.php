<?php

namespace App\Filament\Admin\Actions;

use App\Filament\Admin\Resources\QuizAttemptResource\RelationManagers\UsersRelationManager;
use App\Models\Quiz;
use App\Models\UserQuizAttempt;
use App\Models\UserQuizResponse;
use Filament\Actions\Concerns\CanCustomizeProcess;
use Filament\Support\Facades\FilamentIcon;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DetachActionBelongsTo extends Action
{
    use CanCustomizeProcess;

    public static function getDefaultName(): ?string
    {
        return 'detach';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->label(__('filament-actions::detach.single.label'));

        $this->modalHeading(fn (): string => __('filament-actions::detach.single.modal.heading', ['label' => $this->getRecordTitle()]));

        $this->modalSubmitActionLabel(__('filament-actions::detach.single.modal.actions.detach.label'));

        $this->successNotificationTitle(__('filament-actions::detach.single.notifications.detached.title'));

        $this->color('danger');

        $this->icon(FilamentIcon::resolve('actions::detach-action') ?? 'heroicon-m-x-mark');

        $this->requiresConfirmation();

        $this->modalIcon(FilamentIcon::resolve('actions::detach-action.modal') ?? 'heroicon-o-x-mark');

        $this->action(function (): void {
            $this->process(function (Model $record, Table $table): void {

                $queryStringIdentifier = $table->getQueryStringIdentifier();
                $user = $record->id;

                switch($queryStringIdentifier){
                    case 'usersRelationManager':
                        $quizAttemptId = $record->attempt_id;
                        $userQuizAttempt = UserQuizAttempt::query()
                            ->where('attempt_id', $quizAttemptId)
                            ->where('user_id', $user)
                            ->first();

                        if(UserQuizResponse::query()->where('user_quiz_attempt_id', $userQuizAttempt->id)->exists()){
                            $this->notify(__('Toets al uitgevoerd, kan niet worden verwijderd'));
                            return;
                        }
                        $userQuizAttempt->delete();
                    case 'quizesRelationManager':
                        $courseId = $record->course_id;
                        $quiz = Quiz::query()
                            ->where('course_id', $courseId)
                            ->where('id', $record->id)
                            ->first();

                        $quiz->course_id = NULL;
                        $quiz->save();
                    }

            });
        });

    }
}

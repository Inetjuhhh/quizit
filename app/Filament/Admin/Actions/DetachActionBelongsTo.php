<?php

namespace App\Filament\Admin\Actions;

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

                $quizAttemptId = $record->attempt_id;
                $user = $record->id;
                $userQuizAttempt = UserQuizAttempt::query()
                    ->where('attempt_id', $quizAttemptId)
                    ->where('user_id', $user)
                    ->first();

                if(UserQuizResponse::query()->where('user_quiz_attempt_id', $userQuizAttempt->id)->exists()){
                    $this->notify(__('Toets al uitgevoerd, kan niet worden verwijderd'));
                    return;
                }
                $userQuizAttempt->delete();
            });
        });

    }
}

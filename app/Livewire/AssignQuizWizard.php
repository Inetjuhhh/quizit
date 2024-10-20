<?php

use Filament\Forms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Concerns\InteractsWithForms;
use Livewire\Component;
use App\Models\UserQuiz;
use App\Models\Quiz;
use App\Models\User;
use Filament\Forms\Components\Hidden;

class AssignQuizWizard extends Component implements HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $form;

    public function mount()
    {
        $this->form = $this->makeForm()
            ->schema($this->getFormSchema())
            ->model(new UserQuiz());
    }

    public function render()
    {
        return view('livewire.assign-quiz-wizard', [
            'form' => $this->form->render(),
        ]);
    }


    protected function getFormSchema(): array
    {
        return [
            Wizard::make([
                Wizard\Step::make('quiz_id')
                    ->label('Kies Quiz')
                    ->schema([
                        Hidden::make('user_id')
                            ->default(fn() => auth()->id()),
                        Select::make('quiz_id')
                            ->label('Quiz')
                            ->options(Quiz::all()->pluck('name', 'id'))
                            ->required(),
                    ]),
                Wizard\Step::make('attendees')
                    ->label('Deelnemers')
                    ->schema([
                        Select::make('attendees')
                            ->multiple()
                            ->label('Deelnemers')
                            ->options(User::all()->pluck('name', 'id'))
                            ->required(),
                    ]),
                Wizard\Step::make('period')
                    ->label('Periode')
                    ->schema([
                        DateTimePicker::make('started_at')
                            ->label('Geopend op')
                            ->default(now())
                            ->disabled(),
                        DateTimePicker::make('completed_at')
                            ->label('Sluit op')
                            ->default(now()->addDays(7))
                            ->required(),
                    ]),
            ])->submitAction('Assign Quiz'),
        ];
    }

    public function assignQuiz()
    {
        $data = $this->form->getState();

        foreach ($data['attendees'] as $userId) {
            UserQuiz::create([
                'user_id'      => $userId,
                'quiz_id'      => $data['quiz_id'],
                'started_at'   => $data['started_at'],
                'completed_at' => $data['completed_at'],
            ]);
        }

        session()->flash('success', 'Quiz successfully assigned to users!');
    }
}
?>

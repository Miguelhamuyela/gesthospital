<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            [
                'question' => 'What is the capital of France?',
                'answers' => [
                    ['answer' => 'Paris', 'is_correct' => true],
                    ['answer' => 'Berlin', 'is_correct' => false],
                    ['answer' => 'Madrid', 'is_correct' => false],
                    ['answer' => 'Rome', 'is_correct' => false],
                    ['answer' => 'Lisbon', 'is_correct' => false],
                ]
            ],
            [
                'question' => 'What is 2 + 2?',
                'answers' => [
                    ['answer' => '3', 'is_correct' => false],
                    ['answer' => '4', 'is_correct' => true],
                    ['answer' => '5', 'is_correct' => false],
                    ['answer' => '6', 'is_correct' => false],
                    ['answer' => '7', 'is_correct' => false],
                ]
            ],
            // Adicione mais perguntas aqui
        ];

        foreach ($questions as $q) {
            $question = Question::firstOrCreate(['question' => $q['question']]);
            foreach ($q['answers'] as $a) {
                $question->answers()->firstOrCreate($a);
            }
        }
    }
}

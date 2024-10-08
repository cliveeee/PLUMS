<?php

namespace Database\Seeders;

use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quizzes = [
            [
                'title' => 'Cyber Security Quiz',
                'course_id' => 1,
                'level' => 'Easy',
                'questions' => [
                    [
                        'question_text' => 'What is the primary purpose of a firewall?',
                        'answers' => [
                            ['answer_text' => 'To store passwords securely', 'is_correct' => false],
                            ['answer_text' => 'To encrypt data', 'is_correct' => false],
                            ['answer_text' => 'To prevent unauthorized access to or from a private network', 'is_correct' => true],
                            ['answer_text' => 'To perform network speed tests', 'is_correct' => false],
                        ],
                    ],
                    [
                        'question_text' => 'Which of the following is a type of malware that restricts access to the computer system it infects and demands a ransom paid to the creator of the malware?',
                        'answers' => [
                            ['answer_text' => 'Spyware', 'is_correct' => false],
                            ['answer_text' => 'Ransomware', 'is_correct' => true],
                            ['answer_text' => 'Adware', 'is_correct' => false],
                            ['answer_text' => 'Trojan', 'is_correct' => false],
                        ],
                    ],
                ],
            ],

            [
                'title' => 'Data Privacy Quiz',
                'course_id' => 2,
                'level' => 'Medium',
                'questions' => [
                    [
                        'question_text' => 'What is GDPR?',
                        'answers' => [
                            ['answer_text' => 'General Data Protection Regulation', 'is_correct' => true],
                            ['answer_text' => 'Global Data Protection Regulation', 'is_correct' => false],
                            ['answer_text' => 'General Data Policy Regulation', 'is_correct' => false],
                            ['answer_text' => 'Growth Data Protection Regulation', 'is_correct' => false],
                        ],
                    ],
                ],
            ],
            // Add more quizzes as needed
        ];

        foreach ($quizzes as $quizData) {
            // Create the quiz
            $quiz = Quiz::create([
                'title' => $quizData['title'],
                'course_id' => $quizData['course_id'],
                'level' => $quizData['level'],
            ]);

            // Create questions and their answers
            foreach ($quizData['questions'] as $questionData) {
                // Create the question
                $question = Question::create([
                    'quiz_id' => $quiz->id,
                    'question_text' => $questionData['question_text'],
                ]);

                // Create the answers for this question
                foreach ($questionData['answers'] as $answerData) {
                    Answer::create([
                        'question_id' => $question->id,
                        'answer_text' => $answerData['answer_text'],
                        'is_correct' => $answerData['is_correct'],
                    ]);
                }
            }
        }
    }
}

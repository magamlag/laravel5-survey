<?php

use Illuminate\Database\Seeder;
use App\Question;
use App\Answer;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(QuestionsSeeder::class);
        $this->call(AnswersSeeder::class);
    }
}

class QuestionsSeeder extends Seeder {
    public function run()
    {
        DB::table('questions')->delete();
        Question::create([
            'id'=>1,
            'text'=>'Вопрос 1'
        ]);

        Question::create([
            'id'=>2,
            'text'=>'Вопрос 2'
        ]);

        Question::create([
            'id'=>3,
            'text'=>'Вопрос 3'
        ]);
    }
}

class AnswersSeeder extends Seeder {
    public function run()
    {
        DB::table('answers')->delete();
        Answer::create([
            'id'=>1,
            'text'=>'Ответ 1',
            'qId'=>1,
            'count'=>10
        ]);

        Answer::create([
            'id'=>2,
            'text'=>'Ответ 2',
            'qId'=>1,
            'count'=>10
        ]);

        Answer::create([
            'id'=>3,
            'text'=>'Ответ 3',
            'qId'=>1,
            'count'=>10
        ]);

        Answer::create([
            'id'=>4,
            'text'=>'Ответ 4',
            'qId'=>1,
            'count'=>10
        ]);

        Answer::create([
            'id'=>5,
            'text'=>'Ответ 1',
            'qId'=>2,
            'count'=>10
        ]);

        Answer::create([
            'id'=>6,
            'text'=>'Ответ 2',
            'qId'=>2,
            'count'=>10
        ]);

        Answer::create([
            'id'=>7,
            'text'=>'Ответ 3',
            'qId'=>2,
            'count'=>10
        ]);

        Answer::create([
            'id'=>8,
            'text'=>'Ответ 4',
            'qId'=>2,
            'count'=>10
        ]);

        Answer::create([
            'id'=>9,
            'text'=>'Ответ 1',
            'qId'=>3,
            'count'=>10
        ]);

        Answer::create([
            'id'=>10,
            'text'=>'Ответ 2',
            'qId'=>3,
            'count'=>10
        ]);

        Answer::create([
            'id'=>11,
            'text'=>'Ответ 3',
            'qId'=>3,
            'count'=>10
        ]);

        Answer::create([
            'id'=>12,
            'text'=>'Ответ 4',
            'qId'=>3,
            'count'=>10
        ]);
    }
}


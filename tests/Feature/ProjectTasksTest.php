<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTasksTest extends TestCase {

    /** @test */
    public function a_project_can_have_tasks()
    {
        $this->signIn();

        $project = Project::factory()->create( [ 'owner_id' => auth()->id() ] );

        $this->post( $project->path() . '/tasks', [ 'body' => 'Test Task' ] );

        $this->get( $project->path() )
             ->assertSee( 'Test Task' );
    }

    /** @test */
    public function a_task_can_be_updated()
    {
        $this->signIn();
        $project = auth()->user()->projects()->create(
            Project::factory()->raw()
        );

        $task = $project->addTask( 'testsestses' );

        $this->patch($task->path(), [
            'body'       => 'changed',
            'completed' => true
        ]);

        $this->assertDatabaseHas('tasks', [
            'body'       => 'changed',
            'completed' => true
        ]);
    }

    /** @test */
    public function only_an_owner_of_the_project_may_add_a_task()
    {
        $this->signIn();
        $project = Project::factory()->create();
        $this->post( $project->path() . '/tasks', [ 'body' => 'Test Task123' ] )->assertStatus( 403 );
        $this->assertDatabaseMissing( 'tasks', [ 'body' => 'Test Task123' ] );
    }

    /** @test */
    public function only_an_owner_of_the_project_may_update_a_task()
    {
        $this->signIn();

        $project = Project::factory()->create();

        $task = $project->addTask( 'testTask to update' );

        $this->patch($task->path(), [ 'body' => 'TestTaskUpdated' ] )
             ->assertStatus( 403 );

        $this->assertDatabaseMissing( 'tasks', [ 'body' => 'TestTaskUpdated' ] );
    }

    /** @test */
    public function a_project_requires_a_body()
    {
        $this->signIn();
        $project = auth()->user()->projects()->create(
            Project::factory()->raw()
        );

        $attributes = Task::factory()->raw( [ 'body' => '' ] );
        $this->post( $project->path() . '/tasks', $attributes )->assertSessionHasErrors( 'body' );
    }
}

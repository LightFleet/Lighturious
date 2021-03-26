<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ManageProjectsTest extends TestCase {

    use WithFaker, DatabaseTransactions;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    //    public function test_example()
    //    {
    //        $response = $this->get( '/' );
    //
    //        $response->assertStatus( 200 );
    //    }

    /** @test */
    public function a_user_can_create_a_project()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs( $user );

        $this->get('/projects/create')->assertStatus(200);

        $attributes = [
            'title'       => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'owner_id'    => $user->id,
        ];

        $this->post( '/projects', $attributes )->assertRedirect( '/projects' );

        $this->assertDatabaseHas( 'projects', $attributes );
        $this->get( '/projects' )->assertSee( $attributes[ 'title' ] );
    }

    /** @test */
    public function a_user_can_view_their_project()
    {
        $this->signIn();

        $this->withoutExceptionHandling();

        $project = Project::factory()->create( [ 'owner_id' => auth()->id() ] );

        $this->get( $project->path() )
             ->assertSee( $project->title )
             ->assertSee( $project->description );
    }

    /** @test */
    public function guest_cannot_manage_projects()
    {

        $project = Project::factory()->create();
        $this->get( '/projects' )->assertRedirect( 'login' );
        $this->get( '/projects/create' )->assertRedirect( 'login' );
        $this->post( '/projects', $project->toArray() )->assertRedirect( 'login' );
        $this->get( $project->path() )->assertRedirect( 'login' );

    }

    /** @test */
    public function an_authenticated_user_cannot_view_the_projects_of_others()
    {
        $this->signIn();

        $project = Project::factory()->create();

        $this->get($project->path())->assertStatus(403);
    }

    /** @test */
    public function a_project_requires_a_title()
    {
        $this->signIn();
        $attributes = Project::factory()->raw( [ 'title' => '' ] );

        $this->post( '/projects', $attributes )->assertSessionHasErrors( 'title' );
    }

    /** @test */
    public function a_project_requires_a_description()
    {
        $this->signIn();
        $attributes = Project::factory()->raw( [ 'description' => '' ] );

        $this->post( '/projects', $attributes )->assertSessionHasErrors( 'description' );
    }
}
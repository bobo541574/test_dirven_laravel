<?php

namespace Tests\Feature;

use App\Author;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_author_can_be_created()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/authors', [
            'name' => 'Author Name',
            'dob' => '05/14/1988'
        ]);

        $author = Author::first();

        $this->assertCount(1, Author::all());

        $response->assertRedirect('/authors/' . $author->id);

        $this->assertInstanceOf(Carbon::class, $author->dob);

        $this->assertEquals('1988/14/05', $author->dob->format('Y/d/m'));
    }
}
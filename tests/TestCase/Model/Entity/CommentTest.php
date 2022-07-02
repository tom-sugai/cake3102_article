<?php
namespace App\Test\TestCase\Model\Entity;

use App\Model\Entity\Comment;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Entity\Comment Test Case
 */
class CommentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Entity\Comment
     */
    public $Comment;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Comment = new Comment();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Comment);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

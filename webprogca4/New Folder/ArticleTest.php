<?php
require_once '../Article.php';
/**
 * Generated by PHPUnit_SkeletonGenerator on 2017-04-29 at 21:18:25.
 */
class ArticleTest extends PHPUnit_Framework_TestCase {

    /**
     * @var Article
     */
    protected $art;
 
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->art = new Article(0,'','','','','','','');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers Article::getUserid
     * @todo   Implement testGetUserid().
     */
    public function testGetUserid() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Article::getUsername
     * @todo   Implement testGetUsername().
     */
    public function testGetUsername() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Article::getTitle
     * @todo   Implement testGetTitle().
     */
    public function testGetTitle() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Article::getCategory
     * @todo   Implement testGetCategory().
     */
    public function testGetCategory() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Article::getText
     * @todo   Implement testGetText().
     */
    public function testGetText() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Article::getDate
     * @todo   Implement testGetDate().
     */
    public function testGetDate() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Article::getComments
     * @todo   Implement testGetComments().
     */
    public function testGetComments() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Article::getTags
     * @todo   Implement testGetTags().
     */
    public function testGetTags() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Article::setUserid
     * @todo   Implement testSetUserid().
     */
    public function testSetUserid() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Article::setUsername
     * @todo   Implement testSetUsername().
     */
    public function testSetUsername() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Article::setTitle
     * @todo   Implement testSetTitle().
     */
    public function testSetTitle() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Article::setCategory
     * @todo   Implement testSetCategory().
     */
    public function testSetCategory() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Article::setText
     * @todo   Implement testSetText().
     */
    public function testSetText() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Article::setDate
     * @todo   Implement testSetDate().
     */
    public function testSetDate() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Article::setComments
     * @todo   Implement testSetComments().
     */
    public function testSetComments() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Article::setTags
     * @todo   Implement testSetTags().
     */
    public function testSetTags() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Article::displayTextLength
     * @todo   Implement testDisplayTextLength().
     */
    public function testDisplayTextLength() {
       
        $text = "You can't parse [X]HTML with regex. Because HTML can't be parsed by regex. Regex is not a tool that can be used to correctly parse HTML. As I have answered in HTML-and-regex questions here so many times before, the use of regex will not allow you to consume HTML.";
        
        $this->assertEquals(263,strlen($text));
        $displayText = $this->art->displayTextLength($text);
        $this->assertEquals(140,strlen($displayText));
        
        
    }

}
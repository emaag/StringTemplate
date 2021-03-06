<?php
/*
 * This file is part of StringTemplate.
 *
 * (c) 2013 Nicolò Martini
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace StringTemplate\Test;

use StringTemplate\SprintfEngine;

/**
 * Unit tests for class Engine
 */
class SprintfEngineTest extends \PHPUnit_Framework_TestCase
{

    public function testRender()
    {
        $engine = new SprintfEngine();
        $this->assertEquals(
            sprintf('Oh! %s %s jumped onto %s (%e) table', 'The', 'cat', 1, 1),
            $engine->render(
                'Oh! {subj.det%s} {subj.np%s} {verb} onto {w.where.number%s} ({w.where.number%e}) {w.where.np}',
                array(
                    'verb' => 'jumped',
                    'subj' => array('det' => 'The', 'np' => 'cat'),
                    'w' => array('where' => array('number' => 1, 'np' => 'table'))
                )
            )
        );
    }
}
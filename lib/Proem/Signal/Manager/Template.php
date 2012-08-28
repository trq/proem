<?php

/**
 * The MIT License
 *
 * Copyright (c) 2010 - 2012 Tony R Quilkey <trq@proemframework.org>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */


/**
 * @namespace Proem\Signal\Manager
 */
namespace Proem\Signal\Manager;

use Proem\Signal\Event\Standard as Event;

/**
 * Interface that all signal managers must implement.
 */
interface Template
{
    /**
     * Remove event listeners from a particular index.
     *
     * @param string $name
     * @return Proem\Signal\Manager\Template
     */
    public function remove($name);

    /**
     * Register a listener attached to a particular named event.
     *
     * @param string $name The name of the event to attach to.
     * @param callable $callback The callback that will be executed when the event is triggered.
     *
     * @return Proem\Signal\Manager\Template
     */
    public function attach($name, Callable $callback);

    /**
     * Trigger the execution of all event listeners attached to a named event.
     *
     * @param array $options An array of Proem\Util\Opt\Options objects
     * @return Proem\Signal\Manager\Template
     */
    public function trigger(Event $event, Callable $callback = null);

}

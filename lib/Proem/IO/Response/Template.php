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
 * @namespace Proem\IO\Response
 */
namespace Proem\IO\Response;

/**
 * Interface that all Response objects must implement.
 *
 */
interface Template
{
    /**
     * Set the HTTP body.
     *
     * @param string $string
     * @return Proem\IO\Response\Template;
     */
    public function setBody($string);

    /**
     * Append to the HTTP body.
     *
     * As data is appended to the body the $length
     * property should be incremented accordingly.
     *
     * @param string $string
     * @return Proem\IO\Response\Template;
     */
    public function appendToBody($string);

    /**
     * Retrieve the HTTP body as string.
     *
     * @return string
     */
    public function getBody();

    /**
     * Send the response to the client.
     *
     * This method should first send any headers and then the request body.
     */
    public function send();

}

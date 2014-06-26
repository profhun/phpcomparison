<?php
namespace Dwoo\Plugins\Functions;
use Dwoo\Compiler;

/**
 * Makes the input string lower cased
 * <pre>
 *  * value : the string to process
 * </pre>
 * This software is provided 'as-is', without any express or implied warranty.
 * In no event will the authors be held liable for any damages arising from the use of this software.
 *
 * @author     Jordi Boggiano <j.boggiano@seld.be>
 * @copyright  Copyright (c) 2008, Jordi Boggiano
 * @license    http://dwoo.org/LICENSE   Modified BSD License
 * @link       http://dwoo.org/
 * @version    2.0
 * @date       2013-09-06
 * @package    Dwoo
 */
function functionLowerCompile(Compiler $compiler, $value) {
	return 'mb_strtolower((string) ' . $value . ', $this->charset)';
}

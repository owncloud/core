<?php

/*
 * This file is part of the Assetic package, an OpenSky project.
 *
 * (c) 2010-2014 OpenSky Project Inc
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Assetic\Factory\Loader;

use Assetic\Factory\AssetFactory;
use Assetic\Factory\Resource\ResourceInterface;

/**
 * Loads asset formulae from PHP files.
 *
 * @author Kris Wallsmith <kris.wallsmith@gmail.com>
 */
abstract class BasePhpFormulaLoader implements FormulaLoaderInterface
{
    protected $factory;
    protected $prototypes;

    public function __construct(AssetFactory $factory)
    {
        $this->factory = $factory;
        $this->prototypes = array();

        foreach ($this->registerPrototypes() as $prototype => $options) {
            $this->addPrototype($prototype, $options);
        }
    }

    public function addPrototype($prototype, array $options = array())
    {
        $tokens = token_get_all('<?php '.$prototype);
        array_shift($tokens);

        $this->prototypes[$prototype] = array($tokens, $options);
    }

    public function load(ResourceInterface $resource)
    {
        if (!$nbProtos = count($this->prototypes)) {
            throw new \LogicException('There are no prototypes registered.');
        }

        $buffers = array_fill(0, $nbProtos, '');
        $bufferLevels = array_fill(0, $nbProtos, 0);
        $buffersInWildcard = array();

        $tokens = token_get_all($resource->getContent());
        $calls = array();

        while ($token = array_shift($tokens)) {
            $current = self::tokenToString($token);
            // loop through each prototype (by reference)
            foreach (array_keys($this->prototypes) as $i) {
                $prototype = & $this->prototypes[$i][0];
                $options = $this->prototypes[$i][1];
                $buffer = & $buffers[$i];
                $level = & $bufferLevels[$i];

                if (isset($buffersInWildcard[$i])) {
                    switch ($current) {
                        case '(': ++$level; break;
                        case ')': --$level; break;
                    }

                    $buffer .= $current;

                    if (!$level) {
                        $calls[] = array($buffer.';', $options);
                        $buffer = '';
                        unset($buffersInWildcard[$i]);
                    }
                } elseif ($current == self::tokenToString(current($prototype))) {
                    $buffer .= $current;
                    if ('*' == self::tokenToString(next($prototype))) {
                        $buffersInWildcard[$i] = true;
                        ++$level;
                    }
                } else {
                    reset($prototype);
                    unset($buffersInWildcard[$i]);
                    $buffer = '';
                }
            }
        }

        $formulae = array();
        foreach ($calls as $call) {
            $formulae += call_user_func_array(array($this, 'processCall'), $call);
        }

        return $formulae;
    }

    private function processCall($call, array $protoOptions = array())
    {
        $tmp = tempnam(sys_get_temp_dir(), 'assetic');
        file_put_contents($tmp, implode("\n", array(
            '<?php',
            $this->registerSetupCode(),
            $call,
            'echo serialize($_call);',
        )));
        $args = unserialize(shell_exec('php '.escapeshellarg($tmp)));
        unlink($tmp);

        $inputs  = isset($args[0]) ? self::argumentToArray($args[0]) : array();
        $filters = isset($args[1]) ? self::argumentToArray($args[1]) : array();
        $options = isset($args[2]) ? $args[2] : array();

        if (!isset($options['debug'])) {
            $options['debug'] = $this->factory->isDebug();
        }

        if (!is_array($options)) {
            throw new \RuntimeException('The third argument must be omitted, null or an array.');
        }

        // apply the prototype options
        $options += $protoOptions;

        if (!isset($options['name'])) {
            $options['name'] = $this->factory->generateAssetName($inputs, $filters, $options);
        }

        return array($options['name'] => array($inputs, $filters, $options));
    }

    /**
     * Returns an array of prototypical calls and options.
     *
     * @return array Prototypes and options
     */
    abstract protected function registerPrototypes();

    /**
     * Returns setup code for the reflection scriptlet.
     *
     * @return string Some PHP setup code
     */
    abstract protected function registerSetupCode();

    protected static function tokenToString($token)
    {
        return is_array($token) ? $token[1] : $token;
    }

    protected static function argumentToArray($argument)
    {
        return is_array($argument) ? $argument : array_filter(array_map('trim', explode(',', $argument)));
    }
}

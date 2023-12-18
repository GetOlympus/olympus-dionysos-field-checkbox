<?php

namespace GetOlympus\Dionysos\Field;

use GetOlympus\Zeus\Field\Field;

/**
 * Builds Checkbox field.
 *
 * @package    DionysosField
 * @subpackage Checkbox
 * @author     Achraf Chouk <achrafchouk@gmail.com>
 * @since      0.0.1
 *
 */

class Checkbox extends Field
{
    /**
     * @var string
     */
    protected $style = 'css'.S.'checkbox.css';

    /**
     * @var string
     */
    protected $template = 'checkbox.html.twig';

    /**
     * @var string
     */
    protected $textdomain = 'checkboxfield';

    /**
     * Prepare defaults.
     *
     * @return array
     */
    protected function getDefaults() : array
    {
        return [
            'title'       => parent::t('checkbox.title', $this->textdomain),
            'default'     => '',
            'description' => '',
            'mode'        => '',
            'options'     => [],

            // texts
            't_no_options' => parent::t('checkbox.errors.no_options', $this->textdomain),
        ];
    }

    /**
     * Prepare variables.
     *
     * @param  object  $value
     * @param  array   $contents
     *
     * @return array
     */
    protected function getVars($value, $contents) : array
    {
        // Available mode display: "inline" === "default"
        $modes = ['default', 'block', 'group', 'image', 'image-block', 'inline'];

        // Get contents
        $vars = $contents;

        // Update value
        $vars['value'] = !is_array($value) ? [$value] : $value;

        // Mode
        $vars['mode'] = isset($vars['mode']) ? $vars['mode'] : '';
        $vars['mode'] = in_array($vars['mode'], $modes) ? $vars['mode'] : 'default';

        // Update vars
        return $vars;
    }
}

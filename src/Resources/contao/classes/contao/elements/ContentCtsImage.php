<?php
/**
 * @package     Contao Themes-Shop
 * @filesource  ContentCtsImage.php
 * @version     1.0.0
 * @since       21.09.15 - 15:43
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2015
 * @license     EULA
 */
namespace esit\ctsimage\classes\contao\elements;

use \esit\ctscore\classes\contao\helper\TemplateHelper;
use \esit\ctscore\classes\contao\helper\ImageHelper;

/**
 * Class ContentCtsImage
 * @package ctsimage\classes\contao\elements
 */
class ContentCtsImage extends \ContentElement
{


    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_ctsimage';


    /**
     * Generate the content element
     */
    protected function compile()
    {
        if (TL_MODE == 'BE') {
            $this->genBeOutput();
        } else {
            $this->genFeOutput();
        }
    }


    /**
     * Erzeugt die Ausgebe für das Backend.
     * @return string
     */
    private function genBeOutput()
    {
        $this->strTemplate        = 'be_wildcard';
        $this->Template           = new \BackendTemplate($this->strTemplate);
        $this->Template->title    = $this->headline;
        $this->Template->wildcard = "### ContentCtsImage ###";
    }


    /**
     * Erzeugt die Ausgebe für das Frontend.
     * @return string
     */
    private function genFeOutput()
    {
        $this->arrData['strImage'] = ImageHelper::compile($this->arrData, 'ce_inc_ctsimage');
        $this->Template            = TemplateHelper::setupTemplate($this->strTemplate, $this->arrData);
    }
}

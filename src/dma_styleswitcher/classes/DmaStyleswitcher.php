<?php

/**
 * Run in a custom namespace, so the class can be replaced
 */
namespace DMA;

class DmaStyleswitcher extends \Frontend
{

    private $blnUseSession = true;
    private $strCurrentStyle = "normal";

    public function __construct()
    {

        $objPersistant = null;

        if ($this->blnUseSession)
        {
            $objPersistant = \Session::getInstance();
        }

        if ($objPersistant !== null && $objPersistant->get('style'))
        {
            $this->strCurrentStyle = $objPersistant->get('style');
        }

        parent::__construct();
    }

    public function styleswitcherReplaceInsertTags($strTag, $blnCache = true)
    {
        $arrSplit = explode('::', $strTag);
        if ($arrSplit[0] == 'dmastyleswitcher')
        {
            switch ($arrSplit[1])
            {
                case "class":
                    if (in_array($this->strCurrentStyle, $GLOBALS['DMA_STYLESWITCHER']['STYLES']))
                    {
                        return $GLOBALS['DMA_STYLESWITCHER']['CLASS_PREFIX'] . $this->strCurrentStyle;
                    }
                    break;
                case "toggle":
                    return $this->getHandleLink('toggle', array($arrSplit[2], $arrSplit[3]));
                    break;
            }

        }
        return false;
    }

    public function styleswitcherGeneratePage(\PageModel $objPage, \LayoutModel $objLayout, \PageRegular $objPageRegular)
    {
        if (\Input::get('sy'))
        {

            $strStyleHandler = \Input::get('sy');

            if (in_array($strStyleHandler, $GLOBALS['DMA_STYLESWITCHER']['STYLES']))
            {
                $objPersistant = null;

                if ($this->blnUseSession)
                {
                    $objPersistant = \Session::getInstance();
                }

                if ($objPersistant !== null)
                {
                    $objPersistant->set('style', $strStyleHandler);
                }
            }

            global $objPage;
            $this->redirect($this->generateFrontendUrl($objPage->row()));

        }

        $objTemplate = new \FrontendTemplate('styleswitcher_loader');
        $objTemplate->style = $this->strCurrentStyle;
        $objTemplate->parse();

    }

    private function getHandleLink($strParam, $arrParams)
    {

        global $objPage;

        if ($strParam == "toggle")
        {
            $intHandleKey = 0;

            if (sizeof($arrParams) > 2)
            {
                return;
            }

            foreach ($arrParams as $varValue)
            {
                if ($varValue != $this->strCurrentStyle)
                {
                    $strHandleKey = $varValue;
                }
            }

            if (in_array($strHandleKey, $GLOBALS['DMA_STYLESWITCHER']['STYLES']))
            {
                $objTemplate = new \FrontendTemplate('styleswitcher_togglelink');

                $objTemplate->linkHref = ampersand($this->generateFrontendUrl($objPage->row()) . '?sy=' . $strHandleKey);
                $objTemplate->linkText = $GLOBALS['TL_LANG']['MISC']['CONTRAST'][$strHandleKey] ? $GLOBALS['TL_LANG']['MISC']['CONTRAST'][$strHandleKey] : $strHandleKey;

                return $objTemplate->parse();


            }
        }

    }

}
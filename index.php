<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.Simple
 *
 * @Copyright   (C) Futurelab LLC by Mike J.K.
 * @license     GNU General Public License версия 2 или новее; см. LICENSE.txt
 * Это сильно упрощённа, версия шаблона Joomla, предназначенная для объяснения 
 приципов построения новых шаблонов.
 **/

defined('_JEXEC') or die;

use Joomla\CMS\Factory; // Factory class: Содержит статические методы получения глобальных объектов из приложения Joomla. 
use Joomla\CMS\Language\Text;

/** @var Joomla\CMS\Document\HtmlDocument $this */
$app   = Factory::getApplication(); 
$app->getDocument()->setGenerator('J-CMS');
$wa    = $this->getWebAssetManager(); // Получем ссылку на менеджер медиа-ресурсов - используется для загрузки нашего CSS  и др. в будущем 

//Файлы стилей и сриптов определены в joomla.asset.json!
$wa->useStyle('template.simple.mainstyles');
$wa->useScript('template.simple.scripts');
$this->setMetaData('viewport', 'width=device-width, initial-scale=1');

// Get this template's Media path
$templatePath = '/media/templates/site/' . $this->template;
$this->addHeadLink($templatePath . '/images/favicon.ico', 'icon', 'rel', ['type' => 'image/x-icon']);
// Browsers support SVG favicons
$this->addHeadLink($templatePath . '/images/favicon.svg', 'icon', 'rel', ['type' => 'image/svg+xml']);

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = htmlspecialchars($app->get('sitename'), ENT_QUOTES, 'UTF-8');
$menu     = $app->getMenu()->getActive();
$pageclass = $menu !== null ? $menu->getParams()->get('pageclass_sfx', '') : '';

//Get params from template styling
//If you want to add your own parameters you may do so in templateDetails.xml
$testparam =  $this->params->get('testparam');

?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>">
<head>
	<jdoc:include type="metas" />
 	 <?php // Загрузка CSS и JS файлов web asset manager ?>
	<jdoc:include type="styles" />
	<jdoc:include type="scripts" />
</head>
<body>

 <!-- Заголовок сайта -->
<header>
    <?php if ($this->countModules('header')) : ?>
    <div class="top-bar">
        <jdoc:include type="modules" name="header" style="raw" />
    </div>
    <?php endif; ?>
</header>

<!-- Основной контент -->
<main>
<!-- Область компонента -->
<jdoc:include type="component" />


<!-- Подвал (футер) сайта -->
<footer>     
<?php if ($this->countModules('footer')) : ?>
    <jdoc:include type="modules" name="footer" style="raw" />
<?php endif; ?>
 <p><?php echo Text::_('TPL_SIMPLE_COPYRIGHT'); ?></p>
</footer>

    <!-- Debug position -->
    <jdoc:include type="modules" name="debug" style="none" />

</body>
</html>

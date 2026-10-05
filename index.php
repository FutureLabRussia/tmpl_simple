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

/** @var Joomla\CMS\Document\HtmlDocument $this */
$app   = Factory::getApplication(); 
$wa    = $this->getWebAssetManager(); // Получем ссылку на менеджер медиа-ресурсов - используется для загрузки нашего CSS  и др. в будущем 

//Файлы стилей и сриптов определены в joomla.asset.json!
$wa->useStyle('template.simple.mainstyles');
$wa->useScript('template.simple.scripts');
$this->setMetaData('viewport', 'width=device-width, initial-scale=1');


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
</footer>

    <!-- Debug position -->
    <jdoc:include type="modules" name="debug" style="none" />

</body>
</html>

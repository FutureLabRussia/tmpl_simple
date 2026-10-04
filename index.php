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

?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>">
<head>
    <jdoc:include type="metas" />
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

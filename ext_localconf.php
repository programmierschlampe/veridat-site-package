<?php

/*
 * TYPO3 Extension "Sitepackage for website www.veridat.io"
 *
 * Author: Ing. Gerhard Huber <ids.co.at>
 * https://ids.co.at/
 */

defined('TYPO3_MODE') or die();

call_user_func(
	function ($extKey) {
		//register extension icons
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);

		$iconRegistry->registerIcon(	'content-hero'			,\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,	['source' => 'EXT:' . $extKey . '/Resources/Public/Icons/hero.png']);
		$iconRegistry->registerIcon(	'content-value'		,\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,	['source' => 'EXT:' . $extKey . '/Resources/Public/Icons/value.png']);
		$iconRegistry->registerIcon(	'content-valuerow'		,\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,	['source' => 'EXT:' . $extKey . '/Resources/Public/Icons/valuerow.png']);
		$iconRegistry->registerIcon(	'content-valuebos'		,\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,	['source' => 'EXT:' . $extKey . '/Resources/Public/Icons/valuebox.png']);
		$iconRegistry->registerIcon(	'content-carousel'			,\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,	['source' => 'EXT:' . $extKey . '/Resources/Public/Icons/carousel.png']);
		$iconRegistry->registerIcon(	'content-carouselitem'	,\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,	['source' => 'EXT:' . $extKey . '/Resources/Public/Icons/carouselitem.png']);
	},
    'veridat-site-package'
);

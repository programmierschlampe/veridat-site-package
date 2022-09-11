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

		$iconRegistry->registerIcon(	'content-hero'			,\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,	['source' => 'EXT:' . $extKey . '/Resources/Public/Icons/Hero.svg']);
		$iconRegistry->registerIcon(	'content-value'		,\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,	['source' => 'EXT:' . $extKey . '/Resources/Public/Icons/Values.svg']);
		$iconRegistry->registerIcon(	'content-valuerow'		,\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,	['source' => 'EXT:' . $extKey . '/Resources/Public/Icons/Valuerow.svg']);
		$iconRegistry->registerIcon(	'content-valuebox'		,\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,	['source' => 'EXT:' . $extKey . '/Resources/Public/Icons/Valuebox.svg']);
		$iconRegistry->registerIcon(	'content-carousel'			,\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,	['source' => 'EXT:' . $extKey . '/Resources/Public/Icons/Carousel.svg']);
		$iconRegistry->registerIcon(	'content-carouselitem'	,\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,	['source' => 'EXT:' . $extKey . '/Resources/Public/Icons/Carouselitem.svg']);
	},
    'veridat-site-package'
);

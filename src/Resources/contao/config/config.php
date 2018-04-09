<?php

/**
 * Cron jobs
 */
$GLOBALS['TL_CRON']['minutely'][] = ['bf.piwik.controller.communicator', 'process'];

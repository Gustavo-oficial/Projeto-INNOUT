<?php
session_start();
requireValidSession();

$date = (new DateTime())->getTimestamp();
$today = strftime('%d de %B de %Y', $date);

loadTemplateView('days_records', ['today' => $today]);
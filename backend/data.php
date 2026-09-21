<?php
// Master Data Store for SkillPulse PHP API & Templates

function getSkillPulseData() {
    static $cache = null;
    if ($cache === null) {
        $jsonPath = __DIR__ . '/data.json';
        if (file_exists($jsonPath)) {
            $cache = json_decode(file_get_contents($jsonPath), true);
        } else {
            $cache = [];
        }
    }
    return $cache;
}

$SKILLPULSE_DATA = getSkillPulseData();

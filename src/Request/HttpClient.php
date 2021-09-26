<?php

namespace Wrtisans\STP\Request;

interface HttpClient
{
    public function httpClient();
    public function endpoint(): string;
}

<?php

    function setActiveRoute($name)
    {
        return request()->routeIs($name) ? 'active' : '';
    }

    function setOpenRoute($name)
    {
        return request()->routeIs($name) ? ' open' : '';
    }
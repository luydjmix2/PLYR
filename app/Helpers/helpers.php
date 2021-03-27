<?php

    function setActiveRoute($name)
    {
        return request()->routeIs($name) ? 'active' : '';
    }

    function setOpenRoute($name)
    {
        if(request()->routeIs($name) == $name){
            return request()->routeIs($name) ? 'open' : '';
        }else{
            return request()->routeIs($name) ? 'active' : '';
        }
    }
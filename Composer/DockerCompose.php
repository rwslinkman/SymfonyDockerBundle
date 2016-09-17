<?php

/*
 * This file is part of the 02-docker-phppm package.
 *
 * (c) Daniel Ribeiro <drgomesp@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SymfonyDocker\DockerBundle\Composer;

final class DockerCompose
{
    /**
     * function createSymbolicLink
     * Creates symbolic link for docker-compose file.
     * Might fail for Windows XP, Windows Server 2003 and earlier
     * as they do not support the mklink command
     */
    public static function createSymbolicLink()
    {
        $isWindows = strtoupper(substr(PHP_OS, 0, 3)) === 'WIN';
        if($isWindows) {
            // Not required
            return;
        }

        $target = "vendor/symfony-docker/symfony-docker-bundle/Resources/config/docker/docker-compose.yml";
        $linkName = "docker-compose.yml";
        shell_exec("ln -s ".$target." ".$linkName);
    }
}
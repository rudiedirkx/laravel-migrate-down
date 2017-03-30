<?php

namespace rdx\migratedown;

use Illuminate\Support\ServiceProvider;
use rdx\migratedown\MigrateDownCommand;

class MigrateDownServiceProvider extends ServiceProvider {

	/**
	 *
	 */
	public function register() {
		// Need 'migration.repository' so wait until boot()
	}

	/**
	 *
	 */
	public function boot() {
		$this->app->singleton('command.migrate.down', function($app) {
			return new MigrateDownCommand($app['migration.repository']);
		});

		$this->commands(['command.migrate.down']);
	}

}

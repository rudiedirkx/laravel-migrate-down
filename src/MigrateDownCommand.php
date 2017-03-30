<?php

namespace rdx\migratedown;

use Illuminate\Console\Command;
use Illuminate\Database\Migrations\MigrationRepositoryInterface;
use Illuminate\Database\Migrations\Migrator;
use Illuminate\Support\Debug\Dumper;

class MigrateDownCommand extends Command {

	protected $name = 'migrate:down';

	protected $description = 'Migrate down however much you want';

	protected $migratorRepository;

	/**
	 * @see Illuminate\Database\Migrations\DatabaseMigrationRepository
	 */
	public function __construct(MigrationRepositoryInterface $migratorRepository) {
		parent::__construct();

		$this->migratorRepository = $migratorRepository;
	}

	/**
	 * Do it.
	 */
	public function fire() {
		$dumper = new Dumper;

		$dumper->dump($this->migratorRepository->getMigrations(9999));
		echo "\n";
		$dumper->dump($this->migratorRepository->getLast());
		echo "\n";
	}

}

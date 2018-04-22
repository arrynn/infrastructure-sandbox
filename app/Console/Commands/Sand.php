<?php

namespace App\Console\Commands;

use Arrynn\MultilayeredInfrastructure\Mapper\Builder\MappingCollectionBuilder;
use Arrynn\MultilayeredInfrastructure\Mapper\Contracts\IMappable;
use Arrynn\MultilayeredInfrastructure\Mapper\Contracts\IMappingCollection;
use Arrynn\MultilayeredInfrastructure\Mapper\Mapper;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;

class SampleModel extends Model{
    public $first_attr;
}

class SampleDto implements IMappable{

    public $first_attr;

    static function getMappingCollection(): IMappingCollection
    {
        return MappingCollectionBuilder::create()
            ->addDirectMapping('first_attr')
            ->build();
    }
}

class Sand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sand:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        printf("\n---- Sand executable file begins ----\n");

        printf("Creating dto...\n");
        $dto = new SampleDto();
        $dto->first_attr = 'Yahohu!.';

        printf("Creating model...\n");
        $model = new SampleModel();
        printf("Listing values:\n");
        printf("dto:\t%s\n", $dto->first_attr);
        printf("model:\t%s\n", $model->first_attr);

        printf("beginning to map from dto to model...\n");
        Mapper::map($dto, $model);
        printf("Mapping done. Listing values:\n");
        printf("dto:\t%s\n", $dto->first_attr);
        printf("model:\t%s\n", $model->first_attr);
        printf("Removing value from dto...\n");
        $dto->first_attr = '';
        printf("done. Listing values:\n");
        printf("dto:\t%s\n", $dto->first_attr);
        printf("model:\t%s\n", $model->first_attr);


        printf("\n\n## Trying the same from other side:\n");
        $model = new SampleModel();
        $model->first_attr = 'Foo Works!';
        $dto = new SampleDto();
        printf("model:\t%s\n", $model->first_attr);
        printf("dto:\t%s\n", $dto->first_attr);

        printf("beginning to map from model to dto...\n");
        Mapper::map($model, $dto);
        printf("Mapping done. Listing values:\n");
        printf("model:\t%s\n", $model->first_attr);
        printf("dto:\t%s\n", $dto->first_attr);
        printf("Changing value in dto...\n");
        $dto->first_attr = 'Bar Works!!';
        printf("done. Listing values:\n");
        printf("model:\t%s\n", $model->first_attr);
        printf("dto:\t%s\n", $dto->first_attr);

        printf("\n---- Sand executable file ends ----\n\n");

    }
}

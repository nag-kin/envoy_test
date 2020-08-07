@servers(['web' => 'root@160.251.10.207'])

@task('deploy')
    cd /home/seiu/envoy_test
    git pull origin master
@endtask

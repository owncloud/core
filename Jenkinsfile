#!groovy

timestampedNode('SLAVE') {
    stage 'Checkout'
        checkout scm
        sh '''git submodule update --init'''

    stage 'JavaScript Testing'
        executeAndReport('tests/autotest-results-js.xml') {
            sh '''./autotest-js.sh'''
        }

    stage 'PHPUnit'
        executeAndReport('tests/autotest-results-sqlite.xml') {
            sh '''
            export NOCOVERAGE=1
            unset USEDOCKER
            phpenv local 7.0
            ./autotest.sh sqlite
            '''
        }
        executeAndReport('tests/autotest-results-mysql.xml') {
            sh '''
            export NOCOVERAGE=1
            unset USEDOCKER
            phpenv local 5.4
            ./autotest.sh mysql
            '''
        }
        executeAndReport('tests/autotest-results-pgsql.xml') {
            sh '''
            export NOCOVERAGE=1
            unset USEDOCKER
            phpenv local 5.6
            ./autotest.sh pgsql
            '''
        }
        executeAndReport('tests/autotest-results-oci.xml') {
            sh '''
            export NOCOVERAGE=1
            unset USEDOCKER
            phpenv local 5.5
            ./autotest.sh oci
            '''
        }

    stage 'Files External Testing'
        sh '''phpenv local 7.0
        export NOCOVERAGE=1
        unset USEDOCKER
        ./autotest-external.sh sqlite webdav-ownCloud
        ./autotest-external.sh sqlite smb-silvershell
        ./autotest-external.sh sqlite swift-ceph
        ./autotest-external.sh sqlite smb-windows
        '''
        step([$class: 'JUnitResultArchiver', testResults: 'tests/autotest-external-results-sqlite.xml'])
        step([$class: 'JUnitResultArchiver', testResults: 'tests/autotest-external-results-sqlite-webdav-ownCloud.xml'])
        step([$class: 'JUnitResultArchiver', testResults: 'tests/autotest-external-results-sqlite-smb-silvershell.xml'])
        step([$class: 'JUnitResultArchiver', testResults: 'tests/autotest-external-results-sqlite-swift-ceph.xml'])
        step([$class: 'JUnitResultArchiver', testResults: 'tests/autotest-external-results-sqlite-smb-windows.xml'])

    stage 'Primary Objectstore Test - Swift'
        sh '''phpenv local 7.0

        export NOCOVERAGE=1
        export RUN_OBJECTSTORE_TESTS=1
        export PRIMARY_STORAGE_CONFIG="swift"
        unset USEDOCKER

        rm tests/autotest-results-*.xml
        ./autotest.sh mysql
        '''
        step([$class: 'JUnitResultArchiver', testResults: 'tests/autotest-results-mysql.xml'])

    stage 'Integration Testing'
        sh '''phpenv local 7.0
        rm -rf config/config.php
        ./occ maintenance:install --admin-pass=admin
        rm -rf build/integration/output
        rm -rf build/integration/vendor
        rm -rf build/integration/composer.lock
        cd build/integration
        ./run.sh
       '''
        step([$class: 'JUnitResultArchiver', testResults: 'build/integration/output/*.xml'])
}

void executeAndReport(String testResultLocation, def body) {
    try {
        body.call()
    } catch (Exception e) {
        echo "Test execution failed: ${e}"
    } finally {
        step([$class: 'JUnitResultArchiver', testResults: testResultLocation])
    }
}

// Runs the given body within a Timestamper wrapper on the given label.
def timestampedNode(String label, Closure body) {
    node(label) {
        wrap([$class: 'TimestamperBuildWrapper']) {
            body.call()
        }
    }
}

#!groovy
/*
 * This Jenkinsfile is intended to run on https://ci.owncloud.org and may fail anywhere else.
 * It makes assumptions about plugins being installed, labels mapping to nodes that can build what is needed, etc.
 */

timestampedNode('SLAVE') {
    stage 'Checkout'
        checkout scm
        sh '''git submodule update --init'''

    stage 'PHPUnit 7.0/sqlite'
        executeAndReport('tests/autotest-results-sqlite.xml') {
            sh '''
            export NOCOVERAGE=1
            unset USEDOCKER
            phpenv local 7.0
            ./autotest.sh sqlite
            '''
        }

    stage 'PHPUnit 7.0/mysql'
        executeAndReport('tests/autotest-results-mysql.xml') {
            sh '''
            export NOCOVERAGE=1
            unset USEDOCKER
            phpenv local 7.0
            ./autotest.sh mysql
            '''
        }

    stage 'PHPUnit 5.6/pgsql'
        executeAndReport('tests/autotest-results-pgsql.xml') {
            sh '''
            export NOCOVERAGE=1
            unset USEDOCKER
            phpenv local 5.6
            ./autotest.sh pgsql
            '''
        }

    stage 'PHPUnit 5.6/oci'
        executeAndReport('tests/autotest-results-oci.xml') {
            sh '''
            export NOCOVERAGE=1
            unset USEDOCKER
            phpenv local 5.5
            ./autotest.sh oci
            '''
        }

    stage 'Files External: webdav'
        executeAndReport('tests/autotest-external-results-sqlite-webdav-ownCloud.xml') {
            sh '''phpenv local 7.0
            export NOCOVERAGE=1
            unset USEDOCKER
            ./autotest-external.sh sqlite webdav-ownCloud
            '''
        }

    stage 'Files External: SMB/SAMBA'
        executeAndReport('tests/autotest-external-results-sqlite-smb-silvershell.xml') {
            sh '''phpenv local 7.0
            export NOCOVERAGE=1
            unset USEDOCKER
            ./autotest-external.sh sqlite smb-silvershell
            '''
        }

    stage 'Files External: swift/ceph'
        executeAndReport('tests/autotest-external-results-sqlite-swift-ceph.xml') {
            sh '''phpenv local 7.0
            export NOCOVERAGE=1
            unset USEDOCKER
            ./autotest-external.sh sqlite swift-ceph
            '''
        }

    stage 'Files External: SMB/WINDOWS'
        executeAndReport('tests/autotest-external-results-sqlite-smb-windows.xml') {
            sh '''phpenv local 7.0
            export NOCOVERAGE=1
            unset USEDOCKER
            ./autotest-external.sh sqlite smb-windows
            '''
        }

        step([$class: 'JUnitResultArchiver', testResults: 'tests/autotest-external-results-sqlite.xml'])

    stage 'Primary Objectstore: swift'
        executeAndReport('tests/autotest-results-mysql.xml') {
            sh '''phpenv local 7.0

            export NOCOVERAGE=1
            export RUN_OBJECTSTORE_TESTS=1
            export PRIMARY_STORAGE_CONFIG="swift"
            unset USEDOCKER

            rm tests/autotest-results-*.xml
            ./autotest.sh mysql
            '''
        }

	stage 'Integration Testing'
		executeAndReport('build/integration/output/*.xml') {
			sh '''phpenv local 7.0
			rm -rf config/config.php data/*
			./occ maintenance:install --admin-pass=admin
			rm -rf build/integration/{output,vendor,composer.lock}
			cd build/integration && ./run.sh
		   '''
		}

		if (isOnReleaseBranch()) {
			executeAndReport('build/integration/output/*.xml') {
				sh '''phpenv local 7.0
				rm -rf config/config.php data/*
				./occ maintenance:install --admin-pass=admin
				rm -rf build/integration/{output,vendor,composer.lock}
				cd build/integration && OC_TEST_ALT_HOME=1 ./run.sh
			   '''
			}
			executeAndReport('build/integration/output/*.xml') {
				sh '''phpenv local 7.0
				rm -rf config/config.php data/*
				./occ maintenance:install --admin-pass=admin
				rm -rf build/integration/{output,vendor,composer.lock}
				cd build/integration && OC_TEST_ENCRYPTION_ENABLED=1 ./run.sh
			   '''
			}
			executeAndReport('build/integration/output/*.xml') {
				sh '''phpenv local 7.0
				rm -rf config/config.php data/*
				./occ maintenance:install --admin-pass=admin
				rm -rf build/integration/{output,vendor,composer.lock}
				cd build/integration && OC_TEST_ENCRYPTION_ENABLED=1 OC_TEST_ALT_HOME=1 ./run.sh
			   '''
			}
		}
}

def isOnReleaseBranch ()  {
    if (env.BRANCH_NAME == 'master' || env.BRANCH_NAME == 'stable9.1' || env.BRANCH_NAME == 'stable9' || env.BRANCH_NAME == 'stable8.2') {
        return true;
    }
    return false
}

void executeAndReport(String testResultLocation, def body) {
    def failed = false
    // We're wrapping this in a timeout - if it takes longer, kill it.
    try {
        timeout(time: 120, unit: 'MINUTES') {
            body.call()
        }
    } catch (Exception e) {
        failed = true
        echo "Test execution failed: ${e}"
    } finally {
        step([$class: 'JUnitResultArchiver', testResults: testResultLocation])
    }

    if (failed) {

        if (isOnReleaseBranch()) {
            mail body: "project build error is here: ${env.BUILD_URL}" ,
                subject: "Build on release branch failed: ${env.BRANCH_NAME}",
                to: 'jenkins@owncloud.com'
        }

        error "Test execution failed. Terminating the build"
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

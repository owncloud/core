#!groovy
/*
 * This Jenkinsfile is intended to run on https://ci.owncloud.org and may fail anywhere else.
 * It makes assumptions about plugins being installed, labels mapping to nodes that can build what is needed, etc.
 */

timestampedNode('SLAVE') {
    def currentStage = ''

    stage 'Checkout'
        currentStage = 'Checkout'
        checkout scm
        sh '''composer install'''

    stage 'make dist'
        currentStage = 'make dist'
        sh '''
        phpenv local 5.6
        make dist
        '''

    stage 'PHPUnit 7.0/oci'
        currentStage = 'PHPUnit 7.0/oci'
        executeAndReport('tests/autotest-results-oci.xml', currentStage) {
            sh '''
            export NOCOVERAGE=1
            unset USEDOCKER
            phpenv local 5.6
            make test-php TEST_DATABASE=oci
            '''
        }

    stage 'Files External: SMB/SAMBA'
        currentStage = 'Files External: SMB/SAMBA'
        executeAndReport('tests/autotest-external-results-sqlite-smb-silvershell.xml', currentStage) {
            sh '''phpenv local 7.0
            export NOCOVERAGE=1
            unset USEDOCKER
            make test-external TEST_EXTERNAL_ENV=smb-silvershell
            '''
        }

    stage 'Files External: swift/ceph'
        currentStage = 'Files External: swift/ceph'
        executeAndReport('tests/autotest-external-results-sqlite-swift-ceph.xml', currentStage) {
            sh '''phpenv local 7.0
            export NOCOVERAGE=1
            unset USEDOCKER
            make test-external TEST_EXTERNAL_ENV=swift-ceph
            '''
        }

    stage 'Files External: SMB/WINDOWS'
        currentStage = 'Files External: SMB/WINDOWS'
        executeAndReport('tests/autotest-external-results-sqlite-smb-windows.xml', currentStage) {
            sh '''phpenv local 7.0
            export NOCOVERAGE=1
            unset USEDOCKER
            make test-external TEST_EXTERNAL_ENV=smb-windows
            '''
        }

        step([$class: 'JUnitResultArchiver', testResults: 'tests/autotest-external-results-sqlite.xml'])

    stage 'Primary Objectstore: swift'
        currentStage = 'Primary Objectstore: swift'
        executeAndReport('tests/autotest-results-mysql.xml', currentStage) {
            sh '''phpenv local 7.0

            export NOCOVERAGE=1
            export RUN_OBJECTSTORE_TESTS=1
            export PRIMARY_STORAGE_CONFIG="swift"
            unset USEDOCKER

            make clean-test-results
            make test-php TEST_DATABASE=mysql
            '''
        }

	stage 'Integration Testing'
        currentStage = 'Integration Testing'
		executeAndReport('tests/integration/output/*.xml', currentStage) {
			sh '''phpenv local 7.0
			rm -rf config/config.php data/*
			./occ maintenance:install --admin-pass=admin
			make clean-test-integration
			make test-integration OC_TEST_ALT_HOME=1
		   '''
		}

	stage 'Integration Testing Encrypted'
        currentStage = 'Integration Testing Encrypted'
		if (isOnReleaseBranch()) {
				executeAndReport('tests/integration/output/*.xml', currentStage) {
					sh '''phpenv local 7.0
					rm -rf config/config.php data/*
					./occ maintenance:install --admin-pass=admin
					make clean-test-integration
					make test-integration OC_TEST_ALT_HOME=1 OC_TEST_ENCRYPTION_ENABLED=1
				   '''
				}
			}


	stage 'Integration Testing Encrypted with master key'
        currentStage = 'Integration Testing Encrypted with master key'
		if (isOnReleaseBranch()) {
				executeAndReport('tests/integration/output/*.xml', currentStage) {
					sh '''phpenv local 7.0
					rm -rf config/config.php data/*
					./occ maintenance:install --admin-pass=admin
					make clean-test-integration
					make test-integration OC_TEST_ALT_HOME=1 OC_TEST_ENCRYPTION_MASTER_KEY_ENABLED=1
				   '''
				}
			}

		
}

def isOnReleaseBranch ()  {
    if (env.BRANCH_NAME == 'master' || env.BRANCH_NAME == 'stable10' || env.BRANCH_NAME == 'stable9.1' || env.BRANCH_NAME == 'stable9' || env.BRANCH_NAME == 'stable8.2') {
        return true;
    }
    return false
}

void executeAndReport(String testResultLocation, String stage, def body) {
    def failed = false
    // We're wrapping this in a timeout - if it takes longer, kill it.
    try {
        def timeoutMinutes = 120
        if (stage.startsWith('Integration Testing')) {
            timeoutMinutes = 240
        }
        timeout(time: timeoutMinutes, unit: 'MINUTES') {
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

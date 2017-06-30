#!groovy
/*
 * This Jenkinsfile is intended to run on https://ci.owncloud.org and may fail anywhere else.
 * It makes assumptions about plugins being installed, labels mapping to nodes that can build what is needed, etc.
 */

timestampedNode('SLAVE') {
    stage 'Checkout'
        checkout scm
        sh '''composer install'''

    stage 'JavaScript Testing'
        executeAndReport('tests/autotest-results-js.xml') {
            sh '''make test-js'''
        }


	stage 'Integration Testing'
		executeAndReport('tests/integration/output/*.xml') {
			sh '''phpenv local 7.0
			rm -rf config/config.php data/*
			./occ maintenance:install --admin-pass=admin
			make clean-test-integration
			cd tests/integration/
			./run.sh ./features/checksums.feature
		   '''
		}

		if (isOnReleaseBranch()) {
			executeAndReport('tests/integration/output/*.xml') {
				sh '''phpenv local 7.0
				rm -rf config/config.php data/*
				./occ maintenance:install --admin-pass=admin
				make clean-test-integration
				make test-integration OC_TEST_ALT_HOME=1 OC_TEST_ENCRYPTION_ENABLED=1
			   '''
			}
			executeAndReport('tests/integration/output/*.xml') {
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

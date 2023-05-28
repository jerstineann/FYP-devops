pipeline {
    agent any
    stages {

	// Building stage - container to store web application, database and server

        stage('Build containers') {
            steps {
                sh '/root/scripts/container_for_fyp.sh'
            }
        }

       stage('Gatekeeper') {
            steps {
                script {
                    input(
                        message: 'Approve the deployment?'
                    )
                }
            }
        }

//	stage('Deploy') {
//            steps {
//                // Deploy your application
//            }
//        }

    }
}
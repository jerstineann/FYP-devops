pipeline {
    agent any
    stages {
	
	 stage('Gatekeeper') {
            steps {
                script {
                    input(
                        message: 'Proceed the deployment?'
                    )
                }
            }
        }

	// Building stage - container to store web application & database
	    
           stage('Build containers') {
              steps {
                 sh '/home/shannen/Downloads/container_for_fyp.sh'
              }
           }
	    
	   /*stage('Curl') {
              steps {
                script {
		    final String url = "http://192.16.0.14:8080/sbc/about.php"
                    final String response = sh(script: "curl -Is $url", returnStdout: true).trim()
                    echo response
               }
             }
           }*/

    }
}

pipeline {
    agent any
    
     /*environment {
        // Define the SonarQube Scanner installation
        SONAR_SCANNER_HOME = tool name: 'sonarscanner', type: 'hudson.plugins.sonar.SonarRunnerInstallation'
    }*/
	
    stages {

        stage('Gatekeeper') {
            steps {
                input(message: 'Proceed with deployment?')
            }
        }

        stage('Build Container') {
            steps {

		// Create network if it doesn't exist
        	sh 'docker network create --subnet 192.16.0.0/24 my-network || true' // Use '|| true' to ignore errors if the network already exists

       		// Build and run container for Database
        	sh 'docker build -t db -f /home/shannen/Downloads/db-docker /home/shannen/Downloads'// Build the database container image
        	sh 'docker stop db-con || true' // Stop the container if it is running, ignore errors if the container doesn't exist yet
        	sh 'docker rm db-con || true' // Remove the container if it exists, ignore errors if the container doesn't exist yet
        	sh 'docker run -d --name db-con --net my-network --ip 192.16.0.3 -p 3306:3306 --restart=on-failure:5 --health-cmd="curl -f http://192.16.0.3/ || exit 1" --health-interval=30s --health-retries=5 db-docker' // Run the database container

        	// Build and run container for Web Application
        	sh 'cd /home/shannen/Downloads && docker build -t db -f db-docker .' // Build the web application container image
        	sh 'docker stop web-con || true' // Stop the container if it is running, ignore errors if the container doesn't exist yet
        	sh 'docker rm web-con || true' // Remove the container if it exists, ignore errors if the container doesn't exist yet
        	sh 'docker run -d --name web-con --net my-network --ip 192.16.0.2 -p 80:80 --restart=on-failure:5 --health-cmd="curl -f http://192.16.0.2/ || exit 1" --health-interval=30s --health-retries=5 web-docker' // Run the web application container

		// Build and run container for Database
        	/*sh 'docker build -t db -f /home/dockeradm/Downloads/db-docker .' // Build the database container image
        	sh 'docker stop db-con || true' // Stop the container if it is running, ignore errors if the container doesn't exist yet
        	sh 'docker rm db-con || true' // Remove the container if it exists, ignore errors if the container doesn't exist yet
        	sh 'docker run -d --name db-con --net my-network --ip 192.16.0.3 -p 3306:3306 --restart=on-failure:5 --health-cmd="curl -f http://192.16.0.3/ || exit 1" --health-interval=30s --health-retries=5 db-docker' // Run the database container*/

        	// Build and run container for Web Application
        	/*sh 'docker build -t web -f web-docker .' // Build the web application container image
        	sh 'docker stop web-con || true' // Stop the container if it is running, ignore errors if the container doesn't exist yet
        	sh 'docker rm web-con || true' // Remove the container if it exists, ignore errors if the container doesn't exist yet
        	sh 'docker run -d --name web-con --net my-network --ip 192.16.0.2 -p 80:80 --restart=on-failure:5 --health-cmd="curl -f http://192.16.0.2/ || exit 1" --health-interval=30s --health-retries=5 web-docker' // Run the web application container*/
            	
	    }
        }
        /*stage('SonarQube Analysis') {
            steps {
                script {
                    withSonarQubeEnv('sonarserver') {
                        // Run SonarQube Scanner with custom executable path
                        //sh "${SONAR_SCANNER_HOME}/bin/sonar-scanner"
                        
                        sh '/opt/sonar-scanner/bin/sonar-scanner' +
                           ' -Dsonar.projectKey=SBCT_Test' +
                           ' -Dsonar.sources=.' +
                           ' -Dsonar.host.url=http://192.168.81.152:9000' +
                           ' -Dsonar.login=sqp_32f5e57313d347d0232dd458bfe3297abbb3a30e'
                    }
                }
            }
        }*/
        
    
        /*stage('Quality Gate') {
            steps {
                timeout(time:10, unit: 'MINUTES'){
                    waitForQualityGate abortPipeline: true
                }
            }
        }*/


        
         /*stage('Curl') {
            steps {
               sh 'curl -Is http://196.16.0.3:8080/Sbc1/Sbc1/index.php'
            }
        */}

    /*post {
        failure {
            emailext (
            to: '21012260@myrp.edu.sg',
            subject: 'Pipeline Failed: ${currentBuild.fullDisplayName}',
            body: 'The pipeline failed. Check the console output for details.'
            )
        }
    }*/
 }

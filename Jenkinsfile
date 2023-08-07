pipeline {
    agent any
    
     environment {
        // Define the SonarQube Scanner installation
        SONAR_SCANNER_HOME = tool name: 'sonarscanner', type: 'hudson.plugins.sonar.SonarRunnerInstallation'
    }
	
    stages {

        stage('Gatekeeper') {
            steps {
                input(message: 'Proceed with pipeline deployment?')
            }
        }

	stage('SonarQube Analysis') {
            steps {
                // Change working directory for this stage only
                      script {
                        withSonarQubeEnv('sonarserver') {
                            sh 'cd /home/dockeradm/Downloads/FYP-devops/SBCW && ' +
			       '/opt/sonar-scanner/bin/sonar-scanner' +
			       ' -X' + // Add -X to enable full debug logging
                               ' -Dsonar.projectKey=SBC_Analysis' +
                               ' -Dsonar.sources=.' +
                               ' -Dsonar.host.url=http://192.168.49.1:9000' +
                               ' -Dsonar.login=sqp_9bb12dc43861c4805674417f232acc705b909060'
                        }
                     }
              }
        }

	//To ask user if he/she wants to deploy WAR file into container. If no error found in the WAR file, then user can click proceed. Else, user click abort
        stage('Gatekeeper 2') {
            steps {
                input(message: 'Build containers and Deploy the website?')
            }
        }

	    
	
	stage('Build & Deploy Container') {  
            parallel {
            	stage('Build Database Container') {
                    steps {
                        
                        // Copy necessary files from /home/dockeradm/Downloads to Jenkins build context
                        sh 'cp /home/dockeradm/Downloads/xampp-linux-x64-8.2.4-0-installer.run /var/lib/jenkins/workspace/FYP_Project'
                        sh 'cp /home/dockeradm/Downloads/ib_buffer_pool /var/lib/jenkins/workspace/FYP_Project'
                        sh 'cp /home/dockeradm/Downloads/ibdata1 /var/lib/jenkins/workspace/FYP_Project'
                        sh 'cp /home/dockeradm/Downloads/ib_logfile0 /var/lib/jenkins/workspace/FYP_Project'
                        sh 'cp /home/dockeradm/Downloads/ib_logfile1 /var/lib/jenkins/workspace/FYP_Project'
                        sh 'cp /home/dockeradm/Downloads/ibtmp1 /var/lib/jenkins/workspace/FYP_Project'
                        sh 'cp /home/dockeradm/Downloads/docker-entrypoint.sh /var/lib/jenkins/workspace/FYP_Project'
                        sh 'cp /home/dockeradm/Downloads/start_services.sh /var/lib/jenkins/workspace/FYP_Project'
                        sh 'cp -r /home/dockeradm/Downloads/FYP-devops/sbc /var/lib/jenkins/workspace/FYP_Project'

                        // Create network if it doesn't exist
                        sh 'docker network create --subnet 192.16.0.0/24 my-network || true'

                        // Build and run container for Database
                        sh 'docker stop db-con || true'  //true is to prevent the script from failing due to a non-critical error.
                        sh 'docker rm db-con || true'
                        sh 'docker run -d --name db-con --net my-network --ip 192.16.0.3 -p 3306:3306 --restart=on-failure:5 --health-cmd="curl -f http://192.16.0.3/ || exit 1" --health-interval=30s --health-retries=5 db'
                        
                        // Execute the SQL script inside the container
                        script {
                            sh '''
                            docker cp /var/lib/jenkins/workspace/FYP_Project/setup.sql db-con:/tmp/setup.sql
                            docker exec db-con ls -l /tmp/setup.sql
                            sleep 10 # Wait for container to fully initialize
                            docker exec db-con sh -c "/opt/lampp/bin/mysql -uroot < /tmp/setup.sql"
                            '''
                        }
                    }
                }

                stage('Build Web Application Container') {
                    steps {
                        // Build and run container for Web Application
                        sh 'docker stop web-con || true'
                        sh 'docker rm web-con || true'

                        sh 'docker rmi web1 || true'
                        sh 'docker build -t web1 -f /home/shannen/Downloads/web-docker .'
                        sh 'docker run -d --name web-con --net my-network --ip 192.16.0.2 -p 81:80 --restart=on-failure:5 --health-cmd="curl -f http://192.16.0.2/ || exit 1" --health-interval=30s --health-retries=5 web1'
	                    sleep 10  //Wait for container to fully initialize
                    }
                }
            }
    
      }

	    
       stage('Curl') {
    	   steps {
             script {
              final String url = "http://192.16.0.2/sbc/index.php"
              final String response = sh(script: "curl -Is $url", returnStdout: true).trim()
              echo "$response" // Use $response and enclose $url in curly braces
             }
         }
      }


     }
  }

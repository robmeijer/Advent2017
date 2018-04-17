pipeline {
    agent any

    stages {
        stage('Build') {
            steps {
                sh 'composer install'
            }
        }
        stage('Test') {
            steps {
                sh './bin/phpunit'
            }
        }
        stage('Deploy') {
            steps {
                echo 'WE ARE DEPLOYING SOMETHING'
            }
        }
    }
    post {
        always {
            step([$class: 'WsCleanup'])
        }
    }
}

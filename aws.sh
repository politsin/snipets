aws configure
AWS Access Key ID [None]: 
AWS Secret Access Key [None]: 
Default region name [None]: us-east-1
Default output format [None]: text

aws s3 cp --recursive /opt/ s3://srv-backup/develop/opt/

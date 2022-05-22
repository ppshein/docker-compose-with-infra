# Infrastructure 

This is infrastructure diagram for three layers services called web, api and database. To be honest, if we place web and api layers inside kubernetes, that diagram would be so simple thus I try to use EC2 instances instead to show more my ability about infrastructure diagram. **For security concern, we would place instances for web applications EC2, api instances EC2 and RDS into private subets.**

### Web Layer
We would put WAF in front of web layer in order to prevent DDOS attack and some sort of injection that we can create rules there.

We would use ALB for request distrubtion, some routing rules and some rules that we need to create there. And we would allow only 443 ports can be allowed to access we applications by the way of configuration inside security group.

As for HA, we would deploy web applications into multi-AZ with autoscaling group to scale up and scale down web applications instances as minimum instance is **5** and maximum will be **10** based on application requirement. (In diagram, lack of space I would display only 3 instances)

ASG will create one new instance if CPU utlization is more than 60% and if CPU utlization is more than 70%, it will create two new instances. It can be configured based on application requirement as well.

*However we need to consider about cost optimization as well if required. If between 1am to 5am, we would configure with Cloudwatch event and lambda function to update ASG minimum instance to be 2 or 3 for Web layer and API layer but it's optional.*

**API Layer**
As we assumed API layer is just for web applications, we would allow only requests coming from web layer to access api instances that can be defined at security group in front of api applications instances.

For HA and ASG and cost optimization, it would be same configuration as web application layer.


**Database Layers**
We would use Aurora MySQL for database layer with multi-AZ deployment in order to HA and auto healing purpose as well. 


### Disaster Recovery
For DR plan, we would prepare same environment for another region with minimum resources as well. Lack of space in that diagram, we would create cloudwatch event and lambda function to snapshot database every 30 mins (based on BU requirements) and upload to S3 bucket and in our CICD pipeline, we would deploy into another region as well.

- single instance for web layer
- single instance for api layer
- m5.large for aurora mysql

If something got wrong in our region (we can assume as ap-southeast-1), we would restore snapshot database from S3 bucket and restore into that database and change route from ap-southeast-1 to ap-southeast-2 (DR plan) region. RPO and RTO will not be longer than 30 mins (based on BU requirements).
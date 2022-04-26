## Project Name: ReferMedi 
Make sure that you read the entire readme file and see all the attached stuff, because then only you will get to know the real complexity of this beautiful ready-to-use website which can serve humanity.
This webiste is the prime example og building things using the most primitive things. We have not used any external libraries, frameworks to do a ton of things. From making **POST/GET requests om the go, sending email and sms templates
, making a AI enable JS based voive assistant to synchronizing 3 entities together**, we have made sure that we come up with a solution that can really be useful to the society. The project does not have only **amazing UI/UX** but also it makes usre that it 
is way ahead of other projects in term sof backend support & data retrieval.

## Inspiration
Getting a proper health facility is a dream for all. Not all government/private hospitals have good facilities, equipment, or experienced staff to take care of the people of that city. The issue can be resolved if all the hospitals work collaboratively and ensure good facilities are provided to all.

> For eg: Consider in a small town, a government hospital does not have the equipment to treat the patient, so, the hospital referred that patient to a more equipped hospital near the city. Now the patient feels helpless to go to the referred hospital and explain his/her illness, as they know must follow the same procedures as followed before in the small-town hospital. Like going through the same test, same checkups, etc.

## What it does

The project has the following features:

1️⃣ Patients' records are maintained on the platform, sharing while referring to other hospitals.

2️⃣ Referring patients to other hospitals will be seamless.

3️⃣ The hospitals have a way to connect with **doctor's & patients** & vice versa is also true

4️⃣ The patient will be intimated on two occasions (through Twilio API). One, when the patient is registered by a hospital, and another one, when the patient's referral request is accepted by the other hospital.

5️⃣ When the hospital will make a referral request, then all the related test reports of that patient will be forwarded as an attachment along with the email. So, every hospital will be receiving the referral requests in the form of an email.

6️⃣ Every hospital will be having a statistics page that will be having every referral log. The referral log can have three states which are as follows:

🅰️ **Accepted (A)**: If the referred patient has been accepted

🅱️ **Rejected (R)**: If the referred patient has been rejected

©  **Pending (P)**: If the referral is still pending i.e. the referred-to hospital has not responded to the request

## How we built it?
We thought web application will be an important part of making the project accessible to every hospital because in this manner more and 
more hospitals can collaborate on this platform. So we used **plain PHP, bootstrap, HTML** for making a site that can prove to be an efficient 
solution for the above-stated problem. We have routed various actions of the user such that the hospital can have a seamless experience 
in using the application.

For hosting the website, we used the Hostinger service. Referral request templates have been coded from scratch and the inclusion of reports 
as attachments with email has elevated the project level a lot. To use the messaging service, we used the **Twilio REST API** and configured it 
using the **Integromat** scenarios (webhooks) so the patient will also be intimated about what is going behind the scenes. Initially, we thought 
of making it a hospital-only-oriented website but in the end, we included the patient in the workflow which sort of added new dimensions to 
the project.

## Challenges we ran into
When we thought of integrating Twilio with the project, we were facing many problems like **The message request was failing** again and again because we
were not considering spaces in the parameters for the REST API. Then we solved that by encoding **%20 for spaces**. The webhooks for Twilio was also a 
bit frustrating because we weren't able to properly extract the URL parameters from the request and then form a message body for the SMS

Initially, there was no plan of including the statistics page for hospitals. But as we proceed further we changed a lot of routing in the app and thus 
used PHP to its fullest and then made three states for the request (which are looking beautiful) and pleasing to the eyes.

According to the actions, the app should have 10 separate pages because there are a lot of functionalities running. To limit the number of pages, 
we used the concept of routing along with parameterized GET requests so that we can use a single page for 3-4 actions. (For eg: We have used the Profiles page 
for adding a new patient, changing the hospital stats, adding patient reports, etc.) This thing not only helped us to enhance the UI/UX but also got involved 
in brainstorming and plating around sorting information along with the different route requests.

## Accomplishments that we are proud of

1️⃣ Developing an app in 2 days and also the use case of this project is very high, as it is related to the healthcare industry.

2️⃣ We are sure the hospitals & patients will have a seamless experience while referring and managing patients.

3️⃣ With bare PHP and a few front-end languages we have developed an app that ensures that the users/hospitals will be having the best User Experience. There are plenty of things to play around and thus the end-user will neither be confused nor be bored after using this platform.

4️⃣ From uploading reports of the patients to updating them we are proud of every bit in making this project and it rightly fulfills the purpose of why we made this.


## What we learned
1. Handling REST API requests

2. Making and customizing email templates from scratch & integrating them with PHP.

3. Sending attachments with emails through PHP.

4. Configuring Twilio API and using it with webhooks made through the Integromat platform (now known as Make). 5, Making a completely responsive web app that looks great on every screen size

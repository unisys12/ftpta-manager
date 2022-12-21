FTPTA-MANAGER
=============

A project that I have played around with in many different iterations, but I'm kind of liking the workflow of this. This iteration started out as checking out the Laravel based project, Splade. This project aims to abstract most of the JS involved when creating a SPA. I have another version of this app that I started working on a few weeks ago using Inertiajs and liked it. After a few mornings of messing around, I just keep going. And here we are... &#128054;

## Project Intention
Over the last 3 years of running a in-home dog training business, we have found that there is a lot to be desired when it comes to software offerings within the industry. Yes, there are plenty of options, but they are either too expensive or outdated to the pointed that I feel it would be unsafe to use them. Another issue commonly found is a lack of proper scheduling or time management options available.

## Project Goals
- The project should be give us the ability to manage the following:
    - clients
    - Manage the clients dogs and their status.
    - Associate the breeder & veterinarian contacts of a dog.
    - all client contracts related to purchases of services.
    - sync clients and billing with QuickBooks Online API.
    - All training related events and scheduling.
    - documents related to clients and dogs (vet records, diplomas).
- Create a platform that we can manage ourselves and update as needed.
- Have a client portal for them to log in and manage their schedule, documents and their dog.
- Offer flexible scheduling options for us and our clients.

## Tech Used
- [Laravel v9](https://laravel.com/docs/9.x)
- [Splade v1.1.0](https://splade.dev/docs)
    - Vue 3.2
    - Filepond
    - Choices
    - Flatpicker

### Tech that can be switched out easily
- Currently using a Postgres v15 DB
- Nginx v1.21

_I should include a `.dockerfile` for these &#8593;_

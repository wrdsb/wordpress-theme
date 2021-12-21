---
name: Update public theme
about: Process for updating the public theme
title: x.xx.xx Deployment
labels: deployment
assignees: suzannezc

---

### Prepare tracking

- [ ] Copy this task list to an issue labelled deployment
- [ ] Determine version number, assign it to this task list "x.xx.x deployment"

### Adjust the code

- [ ] Prepare code changes
- [ ] Test changes in WPLabs
> - [ ] revise with client as needed until approved
> - [ ] screenshot testing events
> - [ ] screenshot errors and resolutions
- [ ] Test changes in wwwwrdsbdev
> - [ ] revise with client as needed until approved
> - [ ] screenshot testing events
> - [ ] screenshot errors and resolutions
- [ ] Git commit(s) all code including CHANGELOG.md and style.css version information
- [ ] Git push branch
- [ ] Pull request(s) to Production branch
- [ ] Tag Release, number and name are the same, details contain CHANGELOG.md details
- [ ] Delete branch

### Initiate change process

- [ ] [Submit Change Management Request](https://itservicedesk.wrdsb.ca/ITServiceDesk.WebAccess/wd/object/create.rails?class_name=ChangeManagement.Change&lifecycle_name=NewProcess211)
- [ ] add issue url to Description of CMR "Changes tracked in GitHub: URL"
- [ ] record the number in a comment on this issue
- [ ] provide screenshots of problem and resolution
- [ ] provide rationale for update

### Deploy the changes

- [ ] Update version through WordPress on all networks

> - [ ] wplabs.wrdsb.ca
> - [ ] wptraining.wrdsb.ca
> - [ ] llc.wrdsb.ca
> - [ ] wifidocs.wrdsb.ca
> - [ ] teachers.wrdsb.ca
> - [ ] schools.wrdsb.ca
> - [ ] tech.wrdsb.ca
> - [ ] www.wrdsb.ca

### Complete change process -- successful

- [ ] report change state (success, partial, failed) in CMR noted in comments
- [ ] determine if more steps required (if not successful deployment)
- [ ] if successful, 
- [ ] provide screenshots of success in CMR
- [ ] provide email from client approving changes in production in CMR
- [ ] close any related tickets

### Complete change process -- partial success

- [ ] report change partial success in CMR noted in comments
- [ ] provide screenshots of success in CMR
- [ ] provide details of why the change was not fully implemented and next steps if required
- [ ] provide email from client approving changes in production in CMR
- [ ] close any related tickets

### Complete change process -- failed

- [ ] report change state failed in CMR noted in comments
- [ ] determine and report next steps
- [ ] provide screenshots of failure and rollback/recovery in CMR

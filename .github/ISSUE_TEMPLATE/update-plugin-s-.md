---
name: Update plugin(s)
about: Process for updating plugin(s) on public installs
title: "[Update] Plugin Name | Old Version -> New Version"
labels: deployment
assignees: suzannezc

---

## Update plugin

### Prepare tracking
- [ ] copy this list to WordPress Static repo
- [ ] determine which plugin(s) and addons require updating on which install
- [ ] add plugin name, from version and to version numbers to comments
- [ ] Screenshot before state in production

### Test the plugin for conflicts
- [ ] Test updated plugin/addon in WPLabs/theme (see Templates)
> - [ ] Review any issues, challenges, and record in the comments
> - [ ] Determine if the update can proceed to next tests
- [ ] Test update on the staging environment for the installs which will get the update (list below, add/remove as needed)
> - [ ] wwwwrdsbstage
> - [ ] wrdsbtechstg
> - [ ] wrdsbstaff04
> - [ ] schoolswrdsb
> - [ ] llcwrdsb
> - [ ] stagingstswr

### Initiate change process
- [ ] create CMR based on semantic versioning (ask if you're not certain)
> - [ ] Emergency/Hot Fix for broken function/security
> - [ ] Minor for updates that don't require CAB approval
> - [ ] Major for CAB approval
- [ ] provide screenshots of problem and resolution
- [ ] provide rationale for update

Update on all identified installs (remove installs where n/a from this list)
- [ ] wplabs
- [ ] wptraining.wrdsb.ca
- [ ] staff.wrdsb.ca
- [ ] stswr.ca
- [ ] llc.wrdsb.ca
- [ ] teachers.wrdsb.ca
- [ ] schools.wrdsb.ca
- [ ] www.wrdsb.ca
- [ ] oyap.wrdsb.ca
- [ ] wifidocs.wrdsb.ca

Wrap up change 
- [ ] report success or roll-back
- [ ] write any test cases in WPLabs as required to address new issues found once in production
- [ ] update this process with any changes that arise
- [ ] review live sites for impact (look where expected changes will be as well as core functionality)

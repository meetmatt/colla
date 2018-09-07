Event Storming
==============

Actions
-------
Actions are performed by Actors against Entities and produce Artifacts.

Session Scheduling:
- Manager Schedules a Session in Future for Own Team
- Schedules Session has Opening Date, Closing Date, optional Agenda, Attendees from Own Team or any Foreign Team,
  Scope which is the Range of Dates that the Feedback is Related to (e.g. past 3 months of work).s
- Opening Date can't be in Past.
- Closing Date can't come before Opening Date.
- Closing Date can't be earlier than within Minimum Session Period from Opening Date.
- Scheduled Sessions can't Overlap for a Team. 
- Artifact: Scheduled Session.

Session Opening:
- Calendar Opens the Session when the Opening Date is Due.
- Artifact: Open Session.

Session Attending:
- Contributor as an Attendees Attends the Feedback Session
- Artifact: Attended Session.



Feedback Composing:
- Contributor Composes a Feedback In Regard To the Receiver with a Comment,
  optional Improvements and Grade in Range from 1 to 5, where 5 is the Highest Grade and 1 is the Lowest Grade.
- Artifact: Composed Feedback.

Session Closing:
- Calendar Closes the Feedback Session when Closing Date is Due.
- Closed Session can't be Attended.
- Feedback cannot be Composed for Closed Session.
- Already Submitted Feedback that was Rejected can be Resubmitted indefinitely after Session has been Closed.
- Artifact: Closed Session.

Feedback Submit:
- Contributor Submits Composed Feedback for Review.
- Artifact: Submitted Feedback.





Feedback Reviewing:
- Reviewer Reviews Feedback as Sufficient.
- Artifact: Reviewed Feedback aka Sufficient Feedback.

Feedback Moderation:
- Reviewer Moderates Feedback by Hiding Contributor from Feedback.
- Artifact: Moderated Feedback.

Review Delegation:
- Reviewer Delegates Feedback Reviewing to Delegated Reviewer.
- Review that is Composed in regards to Session Reviewer must be Delegated.
- Contributor can't be Delegated Reviewer.
- Session Reviewer can't be a Delegated Reviewer.
- Delegated Review has Delegated Reviewer for each Contributor.
- Artifact: Delegated Review.

Feedback Rejection:
- Reviewer Rejects Feedback as Insufficient with Justification.
- Artifact: Rejected Feedback aka Insufficient Feedback.

Feedback Resubmitting:
- Insufficient Feedback is Returned Back to the Contributor.
  Contributor Fixes the Insufficient Feedback. 
  Contributor Resubmits a Feedback linked to the Rejected Feedback.
- Artifact: Rejected Feedback.
- Artifact: Resubmitted Feedback.



Report Composition:
- Reporter Composes a Report by Collecting Comments (hiding or showing comment authors),
  Collecting Improvements and Aggregating Grades (min, max, mean, weighted mean, over time average, etc.)
  each Grouped by Receiver with Optional Additional Note from Reviewer.
- Artifact: Composed Report.

Report Submitting:
- Reporter Submits the Composed Report.
- Artifact: Submitted Report.

Report Discussion:
- Reporter Discusses the Published Report with the Receiver.
- Artifact: Discussed Report.

Session Completion:
- Only Reported Session can be Completed.

Report Transfer:
- Report is Transferred to the Receiver after it has been Discussed.
- Receiver is the Owner of all Feedback Reports that are Transferred to him.
- Report is transferred after the Session is Completed.
- Artifact: Transferred Report.



Session Report Composition:
- Manager Composes Aggregated Session Report by Collecting Submitted Sufficient Feedback Reports.
- Only Session which has been Completed can be Reported.
- Artifact: Reported Session.
- Artifact: Session Report

Session Archiving:
- Manager Archives Session
- Only Reported or Canceled Session can be Archived.
- Archived Sessions can only be seen in List of Archived Sessions.
- Artifact: Archived Session.

Roles
-----
User can have one or more roles:
- Manager: Schedule, Reschedule, Cancel, Complete, Report and Archive Sessions.
- Attendee: List, View and Attend Sessions; Be a Contributor of Feedback to one or many Receivers.
- Contributor: List, View, Compose, Submit, Resubmit Feedback. 
- Reviewer: List, View, Review, Moderate and Reject Feedback; Delegate Feedback Review;
- Delegated Reviewer: List, View, Review and Reject Feedback;
- Receiver: List and View Feedback Report; Request Feedback;
- Reporter: List and View Reviewed Feedback; Compose, Submit, Discuss and Transfer Report; 

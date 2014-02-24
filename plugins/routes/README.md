# Call routing for OpenVBX

Dedirect flows based on criteria such as the incoming number's state, area code or group membership. Use with my [Outbound flows plugin][1] to provide different routes based on call direction.

[1]: https://github.com/chadsmith/OpenVBX-Plugin-Outbound

## Installation

[Download][2] the plugin and extract to /plugins

[2]: https://github.com/chadsmith/OpenVBX-Plugin-Routes/archives/master

## Route by area code

1. Add the Area Code applet to your Call or SMS flow
2. Enter one or more area codes to match and an applet for each one
3. (Optional) Enter a default applet in case none of the area codes match

## Route by state

1. Add the State applet to your Call or SMS flow
2. Enter one or more states (2 letters only) to match and an applet for each one
3. (Optional) Enter a default applet in case none of the states match

## Route by call direction

1. Add the Direction applet to your Call flow
2. Enter an applet for incoming calls and outbound calls

## Route by user / group membership

1. Add the If User applet to your Call or SMS flow
2. Select the user or group to test against
3. Enter an applet for if the incoming number is the user or a group member
4. (Optional) Enter an applet for if the number is not the user or a group member

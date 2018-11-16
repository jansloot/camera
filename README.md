# Camera application
Application to search, categorise and map the street camera's of utrecht

## Findings
 - Camera CSV data source is tainted, make sure data is properly validated

## Assumptions
 - The camera name seems to follow the structure of 1-2-3-4 where
    1. Is the abbreviation of the city name in capitals; UTR
    2. Is the abbreviation of the city district name  in capitals; CM
    3. Is the number of the camera
    4. Is a human description of the camera location/recording area
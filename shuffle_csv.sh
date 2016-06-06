#!/bin/bash

python -c "import random, sys; lines = open(sys.argv[1]).readlines(); random.shuffle(lines); print ''.join(lines)," $1 > "shuffled_$1"
